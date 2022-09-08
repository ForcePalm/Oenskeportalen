wishimg.onchange = evt => {
const [file] = wishimg.files
if (file) {
  output.src = URL.createObjectURL(file)
}
}
