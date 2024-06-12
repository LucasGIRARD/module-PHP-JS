function popupCentree(page, largeur, hauteur)
{
    var top = (screen.height - hauteur) / 2;
    var left = (screen.width - largeur) / 2;
    window.open(page, "", "top=" + top + ",left=" + left + ",width=" + largeur + ",height=" + hauteur + "," + "scrollbars=yes, menubar=no, status=no, menubar=no, fullscreen=no, directories=no, titlebar=no, toolbar=no, location=no");
}