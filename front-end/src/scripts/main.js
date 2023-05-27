const main = () => {
    const sidebarDrawer = document.querySelector(".sidebar-course-drawer");

    sidebarDrawer.addEventListener("click", () => {
        const sidebar = document.querySelector(".sidebar-course");
        const main = document.querySelector("main");

        main.classList.toggle("sidebar-opened");
        sidebar.classList.toggle("hide");
    });
};

module.exports = main;
