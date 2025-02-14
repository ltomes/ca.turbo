<?
######################################################
#                                                    #
# CA Auto Turbo Mode copyright 2022, Andrew Zawadzki #
#                                                    #
######################################################

function getLineCount($directory) {
  global $lineCount;

  $allFiles = array_diff(scandir($directory),array(".",".."));
  foreach ($allFiles as $file) {
    if (is_dir("$directory/$file")) {
      getLineCount("$directory/$file");
      continue;
    }
    $extension = pathinfo("$directory/$file",PATHINFO_EXTENSION);
    if ( $extension == "sh" || $extension == "php" || $extension == "page" ) {
      $lineCount = $lineCount + count(file("$directory/$file"));
    }
  }
}
$author = "Andrew Zawadzki"
$copyrightYear = date("Y");
$caCredits = "
    <center><table align:'center'>
      <tr>
        <td><img src='https://github.com/Squidly271/plugin-repository/raw/master/Chode_300.gif' width='50px';height='48px'></td>
        <td><strong>${$author}</strong></td>
        <td>Main Development</td>
      </tr>
    </table></center>
    <br>
    <center><em><font size='1'>Copyright 2017-${$copyrightYear} ${$author}</font></em></center>
    <center><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7M7CBCVU732XG' target='_blank'><img src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif'></a></center>
    <br><center><a href='http://lime-technology.com/forum/index.php?topic=40262.0' target='_blank'>Plugin Support Thread</a></center>
  ";
  getLineCount("/usr/local/emhttp/plugins/ca.turbo");
  $caCredits .= "<center>$lineCount Lines of code and counting!</center>";
  $caCredits = str_replace("\n","",$caCredits);
?>