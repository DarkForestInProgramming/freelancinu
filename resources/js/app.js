import "./bootstrap";
import Search from "./live-search";
import CategorySelection from "./categorySelection";

if (document.querySelector(".header-search-icon")) {
    new Search();
}

CategorySelection();
