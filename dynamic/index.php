<?php

$seo_keywords = 'alexlostorto, Alex, Alex lo Storto, Alex Lo Storto, programmer, coder, web developer, open source, binary, binary-clock, binary clock, binary program, program';
$seo_description = 'How real programmers read the time!';
$seo_author = 'Alex lo Storto';
$site_title = 'Binary Clock';

include('components/header.php');

?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        height: 100%;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<?php include('components/clock.php'); ?>
<?php include('components/footer.php'); ?>
