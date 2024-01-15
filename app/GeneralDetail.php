<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralDetail extends Model
{
    //

    protected $table = "generaldetails";

    protected $fillable = [
        'about_content',
        'privacy_policy',
        'terms_of_use',
        'career_writeup',
        'whychooseus_writeup',
        'about_intro',
        'about_image1',
        'about_image2',
        'about_image3',
        'page_holder',
        'who_we_are',
        'what_we_do',
        'home_intro',
        'introimage',
        'aims',
        'home_banner2',
        'home_banner1',
        'chooseimage',
        'column1',
        'column2',
        'column3',
        'column4',
        'header1',
        'header2',
        'slider1',
        'slider1cover',
        'sub_header1',
        'slider2',
        'sub_header2',
        'slider3',
        'header3',
        'sub_header3',
        'chooseus1',
        'chooseus2',
        'chooseus3',
        'chooseus4'
    ];
}
