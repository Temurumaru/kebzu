<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

	public function signInAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		$adm = R::findOne("admins", "login = ? AND password = ?", [$req -> login, hash('sha256', $req -> password)]);

		if(isset($adm)) {
			$_SESSION['admin'] = $adm;

			return redirect() -> route('admin') -> with('success', 'Sign In was successed');
		} else {
			return back() -> withErrors(['login' => 'Login was Failed']);
		}
	}

	public function addAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		if(R::count("admins", "login = ?", [$req -> login]) == 0) {
			$adm = R::dispense('admins');

			$adm -> login = $req -> login;
			$adm -> password = hash('sha256', $req -> password);
			$adm -> level = 1;

			if(R::store($adm)) {
				return redirect() -> route('admin_creator') -> with('success', 'Administrator was created');
			} else {
				return back() -> withErrors(['login' => 'Administrator was NOT created']);
			}
		} else {
			return back() -> withErrors(['login' => 'Еhere is already such an Administrator']);
		}
	}

	public function addPostOnBlog(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:60',
			'text' => 'required|min:20|max:15000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Wallpaper image not found.']);
		}

		$file = $req -> wallpaper_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');


		if(empty($req -> preview_img)) {
			return back() -> withErrors(['preview_img' => 'Preview image not found.']);
		}

		$file = $req -> preview_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
		}

		$prv = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');

		$blog = R::dispense("blog");

		$blog -> title = $req -> title;
		$blog -> lang = ($req -> lang) ? "en" : "ru";
		$blog -> wallpaper = $wlpp;
		$blog -> preview = $prv;
		$blog -> text = $req -> text;
		$blog -> views = 0;
		$blog -> date = date("m d, Y");

		R::store($blog);

		return redirect('admin_blog') -> with('success', 'Post was created.');

	}

	public function updPostOnBlog(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:50',
			'text' => 'required|min:20|max:6000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');

		}

		if(isset($req -> preview_img)) {

			$file = $req -> preview_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
			}

			$prv = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');
		}


		$blog = R::findOne("blog", "id = ?", [$req -> id]);

		$blog -> title = $req -> title;
		$blog -> lang = ($req -> lang) ? "en" : "ru";
		if(isset($wlpp)) $blog -> wallpaper = $wlpp;
		if(isset($prv)) $blog -> preview = $prv;
		$blog -> text = $req -> text;
		$blog -> views = 0;
		$blog -> date = date("m d, Y");

		R::store($blog);

		return redirect('admin') -> with('success', 'Post was updated.');

	}


	
	public function addPartner(Request $req) {
		$req -> validate([
			'name' => 'required|min:4|max:60',
		]);

		$max_avatar_size = 3 * 1024 * 1024;


		if(empty($req -> img)) {
			return back() -> withErrors(['img' => 'Image not found.']);
		}

		$file = $req -> img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['img' => 'Incorrect image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['img' => 'The image is too heavy.']);
		}

		$prv = date("YmdHis").rand(0, 99999999);

		Image::make($file->path())->save(public_path('upl_data/prevs/').$prv, 100, 'png');

		$part = R::dispense("partners");

		$part -> name = $req -> name;
		$part -> img = $prv;

		R::store($part);

		return redirect('admin') -> with('success', 'Partner was created.');

	}


	public function updPostOnServices(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:1000',
			'top_text' => 'required|min:20|max:6000',
			'bottom_text' => 'required|min:50|max:6000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> preview_img)) {

			$file2 = $req -> preview_img;
			$type = $file2 -> getMimeType();
			$error = $file2 -> getError();
			$size = $file2 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['preview_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['preview_img' => 'The Preview image is too heavy.']);
			}

			$prv = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> sponsor_img)) {

			$file = $req -> sponsor_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['sponsor_img' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['sponsor_img' => 'The Preview image is too heavy.']);
			}

			$spr = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/imgs/').$spr, 100, 'jpg');
		}


		$blog = R::findOne("services", "id = ?", [$req -> id]);
		// dd($req);
		$gallery = json_decode($blog -> img, true);
		$imgs_json = [];
		$img_titles_json = [];

		$i = 1;
		while($i <= 3) {
			$fil_path = '';
			eval('$file3 = $req -> img_'.$i.';');
			if(!$file3) {
				$imgs_json['img_'.$i] = (isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "";
				$i++;
				continue;
			}
			$type = $file3 -> getMimeType();
			$error = $file3 -> getError();
			$size = $file3 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999).".jpg";

			$imgs_json['img_'.$i] = $fil_path;
			// File::delete(public_path('upl_data/imgs/').(isset($gallery['img_'.$i])) ? $gallery['img_'.$i] : "");
			Image::make($file3->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			$i++;
		}


		$blog -> title = $req -> title;
		$blog -> title_ru = $req -> title_ru;
		if(isset($wlpp)) $blog -> wallpaper = $wlpp;
		if(isset($prv)) $blog -> preview = $prv;
		if(isset($spr)) $blog -> sponsor = $spr;
		$blog -> top_text = $req -> top_text;
		$blog -> top_text_ru = $req -> top_text_ru;
		$blog -> bottom_text = $req -> bottom_text;
		$blog -> bottom_text_ru = $req -> bottom_text_ru;
		$blog -> img = (string)json_encode($imgs_json);
		$blog -> views = 0;

		R::store($blog);
		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($prv)) Image::make($file2->path())->save(public_path('upl_data/prevs/').$prv, 100, 'jpg');

		return redirect('admin') -> with('success', 'Service was updated.');

	}

	public function updData(Request $req) {

		$data = R::findOne("data", "id = ?", [1]);


		$data -> stat_1_text = $req -> stat_1_text;
		$data -> stat_1_text_ru = $req -> stat_1_text_ru;
		$data -> stat_1 = $req -> stat_1;
		$data -> stat_2_text = $req -> stat_2_text;
		$data -> stat_2_text_ru = $req -> stat_2_text_ru;
		$data -> stat_2 = $req -> stat_2;
		$data -> stat_3_text = $req -> stat_3_text;
		$data -> stat_3_text_ru = $req -> stat_3_text_ru;
		$data -> stat_3 = $req -> stat_3;
		$data -> stat_4_text = $req -> stat_4_text;
		$data -> stat_4_text_ru = $req -> stat_4_text_ru;
		$data -> stat_4 = $req -> stat_4;
		$data -> about_desc = $req -> about_desc;
		$data -> about_desc_ru = $req -> about_desc_ru;
		$data -> about_desc_mini = $req -> about_desc_mini;
		$data -> about_desc_mini_ru = $req -> about_desc_mini_ru;

		R::store($data);

		return redirect() -> route('admin') -> with('success', 'Data was updated');

	}

	public function updContact(Request $req) {

		$data = R::findOne("data", "id = ?", [1]);


		$data -> email = $req -> email;
		$data -> tel = $req -> tel;
		$data -> address = $req -> address;
		$data -> email_2 = $req -> email_2;
		$data -> tel_2 = $req -> tel_2;
		$data -> address_2 = $req -> address_2;
		$data -> email_3 = $req -> email_3;
		$data -> tel_3 = $req -> tel_3;
		$data -> address_3 = $req -> address_3;
		$data -> email_4 = $req -> email_4;
		$data -> tel_4 = $req -> tel_4;
		$data -> address_4 = $req -> address_4;

		$data -> telegram = $req -> telegram;
		$data -> instagram = $req -> instagram;
		$data -> facebook = $req -> facebook;

		R::store($data);

		return redirect() -> route('admin') -> with('success', 'Data was updated');

	}

	public function updHomeWall(Request $req) {
		$req -> validate([
			'title_1' => 'max:60',
			'title_1_ru' => 'max:60',
			'title_1_sub' => 'max:60',
			'title_1_sub_ru' => 'max:60',

			'title_2' => 'max:60',
			'title_2_ru' => 'max:60',
			'title_2_sub' => 'max:60',
			'title_2_sub_ru' => 'max:60',

			'title_3' => 'max:60',
			'title_3_ru' => 'max:60',
			'title_3_sub' => 'max:60',
			'title_3_sub_ru' => 'max:60',

			'title_4' => 'max:60',
			'title_4_ru' => 'max:60',
			'title_4_sub' => 'max:60',
			'title_4_sub_ru' => 'max:60',

			'title_5' => 'max:60',
			'title_5_ru' => 'max:60',
			'title_5_sub' => 'max:60',
			'title_5_sub_ru' => 'max:60',

		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(isset($req -> wall_1)) {

			$file = $req -> wall_1;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> wall_2)) {

			$file2 = $req -> wall_2;
			$type = $file2 -> getMimeType();
			$error = $file2 -> getError();
			$size = $file2 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp2 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> wall_3)) {

			$file3 = $req -> wall_3;
			$type = $file3 -> getMimeType();
			$error = $file3 -> getError();
			$size = $file3 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp3 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> wall_4)) {

			$file4 = $req -> wall_4;
			$type = $file4 -> getMimeType();
			$error = $file4 -> getError();
			$size = $file4 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp4 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		if(isset($req -> wall_5)) {

			$file5 = $req -> wall_5;
			$type = $file5 -> getMimeType();
			$error = $file5 -> getError();
			$size = $file5 -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['admin_home_wallpaper' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['admin_home_wallpaper' => 'The Wallpaper image is too heavy.']);
		}

			$wlpp5 = date("YmdHis").rand(0, 99999999).".jpg";

		}

		$data = R::findOne('wall_slide', 'id = ?', [1]);
		$data2 = R::findOne('wall_slide', 'id = ?', [2]);
		$data3 = R::findOne('wall_slide', 'id = ?', [3]);
		$data4 = R::findOne('wall_slide', 'id = ?', [4]);
		$data5 = R::findOne('wall_slide', 'id = ?', [5]);


		if(isset($req -> title_1)) $data -> title = $req -> title_1;
		if(!isset($req -> title_1)) $data -> title = "";
		if(isset($req -> title_1_ru)) $data -> title_ru = $req -> title_1_ru;
		if(!isset($req -> title_1_ru)) $data -> title_ru = "";
		if(isset($req -> title_1_sub)) $data -> sub_title = $req -> title_1_sub;
		if(!isset($req -> title_1_sub)) $data -> sub_title = "";
		if(isset($req -> title_1_sub_ru)) $data -> title_r_subu = $req -> title_1_sub_ru;
		if(!isset($req -> title_1_sub_ru)) $data -> title_r_subu = "";
		if(isset($wlpp)) $data -> img = $wlpp;

		if(isset($req -> title_2)) $data2 -> title = $req -> title_2;
		if(!isset($req -> title_2)) $data2 -> title = "";
		if(isset($req -> title_2_ru)) $data2 -> title_ru = $req -> title_2_ru;
		if(!isset($req -> title_2_ru)) $data2 -> title_ru = "";
		if(isset($req -> title_2_sub)) $data2 -> sub_title = $req -> title_2_sub;
		if(!isset($req -> title_2_sub)) $data2 -> sub_title = "";
		if(isset($req -> title_2_sub_ru)) $data2 -> title_r_subu = $req -> title_2_sub_ru;
		if(!isset($req -> title_2_sub_ru)) $data2 -> title_r_subu = "";
		if(isset($wlpp2)) $data2 -> img = $wlpp2;

		if(isset($req -> title_3)) $data3 -> title = $req -> title_3;
		if(!isset($req -> title_3)) $data3 -> title = "";
		if(isset($req -> title_3_ru)) $data3 -> title_ru = $req -> title_3_ru;
		if(!isset($req -> title_3_ru)) $data3 -> title_ru = "";
		if(isset($req -> title_3_sub)) $data3 -> sub_title = $req -> title_3_sub;
		if(!isset($req -> title_3_sub)) $data3 -> sub_title = "";
		if(isset($req -> title_3_sub_ru)) $data3 -> title_r_subu = $req -> title_3_sub_ru;
		if(!isset($req -> title_3_sub_ru)) $data3 -> title_r_subu = "";
		if(isset($wlpp3)) $data3 -> img = $wlpp3;

		if(isset($req -> title_4)) $data4 -> title = $req -> title_4;
		if(!isset($req -> title_4)) $data4 -> title = "";
		if(isset($req -> title_4_ru)) $data4 -> title_ru = $req -> title_4_ru;
		if(!isset($req -> title_4_ru)) $data4 -> title_ru = "";
		if(isset($req -> title_4_sub)) $data4 -> sub_title = $req -> title_4_sub;
		if(!isset($req -> title_4_sub)) $data4 -> sub_title = "";
		if(isset($req -> title_4_sub_ru)) $data4 -> title_r_subu = $req -> title_4_sub_ru;
		if(!isset($req -> title_4_sub_ru)) $data4 -> title_r_subu = "";
		if(isset($wlpp4)) $data4 -> img = $wlpp4;

		if(isset($req -> title_5)) $data5 -> title = $req -> title_5;
		if(!isset($req -> title_5)) $data5 -> title = "";
		if(isset($req -> title_5_ru)) $data5 -> title_ru = $req -> title_5_ru;
		if(!isset($req -> title_5_ru)) $data5 -> title_ru = "";
		if(isset($req -> title_5_sub)) $data5 -> sub_title = $req -> title_5_sub;
		if(!isset($req -> title_5_sub)) $data5 -> sub_title = "";
		if(isset($req -> title_5_sub_ru)) $data5 -> title_r_subu = $req -> title_5_sub_ru;
		if(!isset($req -> title_5_sub_ru)) $data5 -> title_r_subu = "";
		if(isset($wlpp5)) $data5 -> img = $wlpp5;

		R::store($data);
		R::store($data2);
		R::store($data3);
		R::store($data4);
		R::store($data5);

		if(isset($wlpp)) Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');
		if(isset($wlpp2)) Image::make($file2->path())->save(public_path('upl_data/wallpapers/').$wlpp2, 100, 'jpg');
		if(isset($wlpp3)) Image::make($file3->path())->save(public_path('upl_data/wallpapers/').$wlpp3, 100, 'jpg');
		if(isset($wlpp4)) Image::make($file4->path())->save(public_path('upl_data/wallpapers/').$wlpp4, 100, 'jpg');
		if(isset($wlpp5)) Image::make($file5->path())->save(public_path('upl_data/wallpapers/').$wlpp5, 100, 'jpg');


		return redirect('admin_home_wallpaper') -> with('success', 'Wall was updated.');

	}

	public function addTextPage(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:20',
			'title_ru' => 'required|min:4|max:20',
			'header' => 'required|min:4|max:60',
			'header_ru' => 'required|min:4|max:60',
			'text' => 'required|min:4|max:30000',
			'text_ru' => 'required|min:4|max:32000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Wallpaper image not found.']);
		}

		$file = $req -> wallpaper_img;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(empty($req -> wallpaper_img)) {
			return back() -> withErrors(['wallpaper_img' => 'Preview image not found.']);
		}
		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
		}

		$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

		Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');


		$page = R::dispense("text_pages");

		$page -> title = $req -> title;
		$page -> title_ru = $req -> title_ru;
		$page -> header = $req -> header;
		$page -> header_ru = $req -> header_ru;
		$page -> text = $req -> text;
		$page -> text_ru = $req -> text_ru;
		$page -> img = $wlpp;

		R::store($page);

		return redirect('admin') -> with('success', 'Page was created.');

	}

	public function updTextPage(Request $req) {
		$req -> validate([
			'title' => 'required|min:4|max:20',
			'title_ru' => 'required|min:4|max:20',
			'header' => 'required|min:4|max:60',
			'header_ru' => 'required|min:4|max:60',
			'text' => 'required|min:4|max:30000',
			'text_ru' => 'required|min:4|max:32000',
		]);

		$max_avatar_size = 3 * 1024 * 1024;

		if(!isset($req -> id)) {
			return false;
		}

		if(isset($req -> wallpaper_img)) {

			$file = $req -> wallpaper_img;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['wallpaper_img' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_avatar_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['wallpaper_img' => 'The Wallpaper image is too heavy.']);
			}

			$wlpp = date("YmdHis").rand(0, 99999999).".jpg";

			Image::make($file->path())->save(public_path('upl_data/wallpapers/').$wlpp, 100, 'jpg');

		}

		$page = R::findOne("text_pages", "id = ?", [$req -> id]);

		$page -> title = $req -> title;
		$page -> title_ru = $req -> title_ru;
		$page -> header = $req -> header;
		$page -> header_ru = $req -> header_ru;
		$page -> text = $req -> text;
		$page -> text_ru = $req -> text_ru;
		if(isset($wlpp)) $page -> img = $wlpp;

		R::store($page);

		return redirect('admin') -> with('success', 'Page was updated.');

	}

	public function delTextPage(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$text_page = R::findOne("text_pages", "id = ?", [$req -> id]);
			R::trash($text_page);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delPostBlog(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$post = R::findOne("blog", "id = ?", [$req -> id]);
			R::trash($post);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delPartner(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$part = R::findOne("partners", "id = ?", [$req -> id]);
			R::trash($part);
			echo "true";
		} else {
			echo false;
		}
	}

	public function delAdmin(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin']) && @$_SESSION['admin'] -> level >= 5) {
			$adm = R::findOne("admins", "id = ? AND level < ?", [$req -> id, 5]);
			R::trash($adm);
			echo "true";
		} else {
			echo false;
		}
	}

}