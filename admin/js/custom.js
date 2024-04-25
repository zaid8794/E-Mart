var home = document.getElementById("index");
var category = document.getElementById("category");
var brand = document.getElementById("brand");
var product = document.getElementById("product");
var contactus = document.getElementById("contactus");
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf("/") + 1);
if (filename == "index.php") {
  home.classList.add("active");
} else if (filename == "category.php") {
  category.classList.add("active");
} else if (filename == "brand.php") {
  brand.classList.add("active");
} else if (filename == "product.php") {
  product.classList.add("active");
} else if (filename == "contactus.php") {
  contactus.classList.add("active");
}
