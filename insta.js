const pages = {};

const base_url = "http://localhost/Instagram-Like-Website/backend/";

pages.loadFor = (page) => {
    eval("pages.load_" + page + "();");

}

pages.getAPI = async (api_url) => {
    try {
        return await axios(api_url);
    } catch (error) {
        workshop_pages.Console("Error from Linking (GET)", error);
    }
}