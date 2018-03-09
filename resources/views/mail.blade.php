<html xmlns="http://www.w3.org/1999/xhtml"><head><meta name="ROBOTS" content="NOINDEX, NOFOLLOW">


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">

        #outlook a {
            padding:0;
            text-decoration:
                    none;
        }
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;}
        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
            mso-line-height-rule: exactly;
            font-family: 'Helvetica';
        }
        table td {
            border-collapse: collapse;
        }
        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        a img {
            border: none;
        }
        .mpzHiddenP
        {
            margin: 0px;
            padding: 0px;
        }
        a{
            text-decoration: none;
        }
        @media screen and (max-width: 480px) {
            .outerContainerStart {padding: 0px !important;}
            .emailwrapto100pc{width:100% !important; height:auto !important;}
            .emailcolsplit{width:100%!important; float:left!important;}
            .table_seperator{width:100%!important; float:left!important; padding: 10px;}
            .hidden480{display: none; !important;}
            .floatLeftPadding{margin-bottom: 10px !important;}
        }

        @media screen and (min-width: 480px) and (max-width: 800px) {
            .outerContainerStart {padding: 0px !important;}
            .emailwrapto100pc{width:100% !important; height:auto !important;}
            .floatLeftPadding{margin-bottom: 10px !important;}
        }

        table[class="nzpImageHolder"] td, .outerContainerStart{ margin: 0px !important;}
        .nzpSocIconsTable{
            margin-top: 10px; margin-bottom: 10px;
        }
        .headerLittlePicHolder{
            margin: 0 auto;
        }
        .nzpHeaderSubText{
            margin-bottom: 10px !important;
        }
        .mytab, .mytab td, .mytab th{

            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body style="-ms-text-size-adjust:100%; padding: 0; margin: 0; -webkit-font-smoothing:antialiased; -webkit-text-size-adjust:none; background-color: #EEEEEE; background-image: url('http://u55.mpmserv.co.uk/cp3/images/newslettertextures/grayWallpaper.jpg'); background-repeat: repeat;">

<table border="1" height="100%" width="100%" cellspacing="0" cellpadding="0" class="outerContainerStart"><tbody><tr><td align="center" valign="top" style="padding: 30px;"><table border="0" cellpadding="0" cellspacing="0" width="650" class="emailwrapto100pc"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" class="emailwrapto100pc "><tbody><tr><td width="50%" align="left" valign="middle"><div style="font-family: Arial; font-size: 12px; color: #000000;">A brief overview of your email</div></td><td width="50%" align="right" valign="middle"><div style="font-family: Arial; font-size: 12px; color: #000000;">Can't see Images? <a href="" style="text-decoration: none; color: #000000;">Click Here</a></div></td></tr></tbody></table><table width="100%" cellpadding="0" cellspacing="0" class="emailwrapto100pc hidden480"><tbody><tr><td height="15"></td></tr></tbody></table><table width="100%" cellpadding="0" cellspacing="0" class="emailwrapto100pc"><tbody><tr><td bgcolor="#ffffff"><table width="100%" cellspacing="0" cellpadding="20" class="emailwrapto100pc"><tbody><tr><td width="100" align="right" valign="middle"><div style="width: 100px; height: 100px; overflow: hidden; border-radius: 0px; background-color: #FFFFFF; vertical-align: middle;" class="headerLittlePicHolder"><a href="webdeveloper.pc.pl/logo/png" style="text-decoration: none;"><img src="http://webdeveloper.pc.pl/logo.png?rnd=0.28586758621836816" width="100" height="100" border="0" alt="WebDeveloper" title="WebDeveloper" id="img-1" class="emailwrapto100pc"></a></div></td><td align="left" valign="middle"><a href="webdeveloper.pc.pl" style="text-decoration: none;"><div style="font-family: Helvetica; font-size: 22px; color: #0f4e66; text-align: Left; line-height: 44px;" class="nzpHeaderMainText">
    @lang('mail.title')</div></a><div style="font-family: Helvetica; font-size: 18px; color: #0f4e66; text-align: Left;" class="nzpHeaderSubText">
    @lang('mail.message')</div></td></tr></tbody></table></td></tr></tbody></table><table width="650" bgcolor="#FFFFFF" cellpadding="20" cellspacing="0" id="nzInnerTable" class="emailwrapto100pc" border="0" style=""><tbody><tr><td><div class=""><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td bgcolor=""><table width="100%" cellspacing="0" cellpadding="0" class="emailwrapto100pc"><tbody><tr><td style="padding-top: 0px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px;"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" bgcolor="" style="background-color: ; border-radius: 0;" width="100%" class="emailcolsplit"><table width="100%" cellspacing="0"><tbody><tr><td align="left" width="100%" valign="top" style="color: #282828; font-size: 14px; font-family: 'Helvetica'; text-align: Left; padding-top: 0px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px;" class="emailwrapto100pc" id="eTxt-2-2"><table class="mytab" style="width: 90%; margin-left: auto; margin-right: auto;">
    <tbody>
    <tr>
        <td>id</td>
        <td>Nadawca</td>
        <td>Typ</td>
        <td>Otrzymano</td>
    </tr>
    @foreach ($print as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['type']}}</td>
        <td>{{$item['date']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>


</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td height="20"><img src="http://u272444.mpmserv.co.uk/cp3/images/spacer.png" width="1" height="1"></td></tr></tbody></table></div></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="Center" bgcolor="#f1f1f1" style="padding: 0px;"><div style=" ;"><div style="color: #5d5d5d; font-size: 10px; font-family: 'Helvetica'; line-height: 20px;"><div style="color: #5d5d5d; font-size: 10px; font-family: 'Helvetica'; line-height: undefined;"><table cellpadding="0" cellspacing="0" class="nzpSocIconsTable"><tbody><tr><td style="padding-bottom: 10px;"><a href="https://www.facebook.com/webdeveloper.lodz/" target="_blank" style="color: rgb(0, 0, 0);"><img src="http://mpzmail.com/cp3/newsletters/edit/ezSocialIcons/facebookC.png" alt="Facebook" title="Facebook" width="40" border="0" style="vertical-align: middle;" class="mpzSocIcon"></a></td></tr></tbody></table><b>WebDeveloper</b><br><p class="mpzHiddenP">tel: 571 425 559<br><br></p>
</div></div></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>


</body></html>