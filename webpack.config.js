const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: "./front-end/src/index.js",
    output: {
        path: path.resolve(__dirname, "front-end/dist"),
        filename: "main.js",
        clean: true,
        library: "lib",
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
            directory: path.join(__dirname, "./front-end/src/"),
        },
        compress: true,
        port: 3000,
        liveReload: true,
    },
    plugins: [
        new HtmlWebpackPlugin({
            filename: "admin-dashboard.html",
            template: "./front-end/src/template/admin-dashboard/index.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-courses.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-courses.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-students.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-students.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-teachers.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-teachers.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-courses-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-courses-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-teachers-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-teachers-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-students-add.html",
            template:
                "./front-end/src/template/admin-dashboard/admin-dashboard-students-add.html",
        }),
        new HtmlWebpackPlugin({
            filename: "admin-dashboard-courses-add.html",
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
            filename: "landing-page.html",
            template: "./front-end/src/template/landing-page.html",
        }),
        new MiniCssExtractPlugin(),
    ],
};
