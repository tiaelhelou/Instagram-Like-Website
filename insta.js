const pages = {};

const base_url = "http://localhost/Instagram-Like-Website/backend/";

pages.loadFor = (page) => {
    eval("pages.load_" + page + "();");

}