const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: "./front-end/src/index.js",
    output: {
        path: path.resolve(__dirname, "front-end/dist/"),
        filename: "main.js",
        clean: true,
    },
    mode: "development",
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
            },
        ],
    },
    devtool: false,
    devServer: {
        static: {
            directory: path.join(__dirname, "./front-end/dist/"),
        },
        compress: true,
        port: 3000,
        liveReload: true,
    },
    plugins: [
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/index.html",
            template: "./front-end/src/template/admin-dashboard/index.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-courses.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-courses.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-students.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-students.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-teachers.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-teachers.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-courses-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-courses-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-teachers-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-teachers-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-students-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-students-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard/admin-dashboard-courses-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-courses-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "login.html",
            template: "./front-end/src/template/auth/login.html",
        }),
        new HtmlWebpackPlugin({
            filename: "register.html",
            template: "./front-end/src/template/auth/register.html",
        }),
        new HtmlWebpackPlugin({
            filename: "student-dashboard/index.html",
            template: "./front-end/src/template/student-dashboard/index.html",
        }),
        new HtmlWebpackPlugin({
            filename: "student-dashboard/student-course.html",
            template:
                "./front-end/src/template/student-dashboard/student-course.html",
        }),
        new HtmlWebpackPlugin({
            filename: "teacher-dashboard/index.html",
            template: "./front-end/src/template/teacher-dashboard/index.html",
        }),
        new HtmlWebpackPlugin({
            filename: "courses.html",
            template: "./front-end/src/template/courses.html",
        }),
        new HtmlWebpackPlugin({
            filename: "index.html",
            template: "./front-end/src/template/index.html",
        }),
        new MiniCssExtractPlugin(),
    ],
};
