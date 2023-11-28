import "./bootstrap";
import Search from "./live-search";
import CategorySelection from "./categorySelection";
import Chat from "./chat";

if (document.querySelector(".header-search-icon")) {
    new Search();
}

if (document.querySelector(".header-chat-icon")) {
    new Chat();
}

CategorySelection();
