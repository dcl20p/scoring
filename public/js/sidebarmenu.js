document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    var url = window.location.href;
    var path = url.replace(window.location.origin + "/", "");

    var elements = document.querySelectorAll("ul#sidebarnav a");

    elements.forEach(function (element) {
        if (element.href === url || element.href.endsWith(path)) {
            let parent = element.closest(".sidebar-nav");

            while (parent) {
                if (parent.tagName === "LI" && parent.querySelector("a")) {
                    parent.querySelector("a").classList.add("active");
                    if (!parent.closest("ul#sidebarnav")) {
                        parent.classList.add("active");
                    } else {
                        parent.classList.add("selected");
                    }
                } else if (
                    parent.tagName !== "UL" &&
                    !parent.querySelector("a")
                ) {
                    parent.classList.add("selected");
                } else if (parent.tagName === "UL") {
                    parent.classList.add("in");
                }
                parent = parent.parentElement;
            }

            element.classList.add("active");
        }
    });

    document.querySelectorAll("#sidebarnav a").forEach(function (anchor) {
        anchor.addEventListener("click", function (e) {
            if (!this.classList.contains("active")) {
                // Ẩn tất cả menu con đang mở và xoá class "active"
                this.closest("ul")
                    .querySelectorAll("ul")
                    .forEach((el) => el.classList.remove("in"));
                this.closest("ul")
                    .querySelectorAll("a")
                    .forEach((el) => el.classList.remove("active"));

                // Mở menu con mới và thêm class "active"
                var nextUl = this.nextElementSibling;
                if (nextUl && nextUl.tagName === "UL") {
                    nextUl.classList.add("in");
                }
                this.classList.add("active");
            } else {
                this.classList.remove("active");
                var nextUl = this.nextElementSibling;
                if (nextUl && nextUl.tagName === "UL") {
                    nextUl.classList.remove("in");
                }
            }
        });
    });

    document
        .querySelectorAll("#sidebarnav > li > a.has-arrow")
        .forEach(function (anchor) {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
            });
        });
});
