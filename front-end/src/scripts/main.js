const Quill = require("quill");

const main = () => {
    // const sidebarDrawer = document.querySelector(".sidebar-course-drawer");
    // sidebarDrawer.addEventListener("click", () => {
    //     const sidebar = document.querySelector(".sidebar-course");
    //     const main = document.querySelector("main");
    //     main.classList.toggle("sidebar-opened");
    //     sidebar.classList.toggle("hide");
    // });

    // const container = document.getElementById("editor");
    // console.log(container);
    // const editor = new Quill(container);

    var quill = new Quill("#editor-container", {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ["bold", "italic", "underline"],
                ["image", "code-block"],
            ],
        },
        placeholder: "Compose an epic...",
        theme: "snow", // or 'bubble'
    });
};

module.exports = main;
