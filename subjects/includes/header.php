<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php print $page_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" content="<?php if (isset($description)) {print $description;} ?>" />
<meta name="Keywords" content="<?php if (isset($keywords)) {print $keywords;} ?>" />
<meta name="Author" content="" />
<link type="text/css" media="screen" rel="stylesheet" href="<?php print $AssetPath; ?>css/shared/pure.css">
<link type="text/css" media="screen" rel="stylesheet" href="<?php print $AssetPath; ?>css/public/default.css">
<!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700|Roboto:400,700|Lato:400,700|Oswald|Raleway:400,700|Ubuntu:400,700' rel='stylesheet' type='text/css'> -->
<!-- <link type="text/css" media="print" rel="stylesheet" href="<?php print $AssetPath; ?>css/print.css"> -->

<?php // Load our jQuery libraries + some css
if (isset($use_jquery)) { print generatejQuery($use_jquery);
}

if (!isset ($noheadersearch)) { 
    
    $search_form = '
            <div class="autoC" id="autoC">
                <form id="sp_admin_search" class="pure-form" method="post" action="' . getSubjectsURL() . 'search.php">
                <input type="text" placeholder="Search" autocomplete="off" name="searchterm" size="" id="sp_search" class="ui-autocomplete-input autoC"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                <input type="submit" alt="Search" name="submitsearch" id="topsearch_button" class="pure-button pure-button-topsearch" value="Go">
                </form>
            </div>    ';
} else {
    $search_form = '';
}

// We've got a variable for those who wish to keep the old styles
$v2styles = TRUE;
?>
</head>

<body>

<div id="header"> 
    <div id="header_inner_wrap">
    <div class="pure-g-r">
        <div class="pure-u-1-5">
            <a href="<?php print $PublicPath; ?>"><img src="<?php print $AssetPath; ?>images/public/logo.png" alt="Home Page" /></a>
            
        </div>
        <div class="pure-u-4-5">
            <?php if (isset($v2styles)) { print "<h1>$page_title</h1>"; } ?>
        </div>

    </div>
    </div>
    </div>
</div>


<div class="pure-g-r">
    <div class="wrapper-full">
        <div class="pure-u-1">
        <?php if (!isset($v2styles)) { print "<h1>$page_title</h1>"; } ?>
        <div id="content_roof"></div> <!-- end content_roof -->
        <div id="shadowkiller"></div>
        <div id="body_inner_wrap">
