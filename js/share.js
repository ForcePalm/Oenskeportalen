function share() {
  var id = listid;
  var text = "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/oversigt/shared.php?id="+id;
   // Copy the text inside the text field
  navigator.clipboard.writeText(text);

  // Alert the copied text
  alert("Dit delelink er nu kopieret: " + text);
}
