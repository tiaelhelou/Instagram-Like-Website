const pages = {};

const base_url = "http://localhost/Instagram-Like-Website/backend/";

pages.loadFor = (page) => {
    eval("pages.load_" + page + "();");

}

pages.getAPI = async (api_url) => {
    try {
        return await axios(api_url);
    } catch (error) {
        pages.Console("Error from Linking (GET)", error);
    }
}

pages.postAPI = async (api_url, api_data, api_token = null) => {
    try {
        return await axios.post(
            api_url,
            api_data,
            {
                headers: {
                    'Authorization': "token" + api_token
                }
            }
        );
    } catch (error) {
        pages.Console("Error from Linking (POST)", error);
    }
}

pages.load_login = async () => {

    btn.addEventListener("click", async function () {
        const input = document.getElementsByClassName("input");

        const url = base_url + "login.php";

        const post_data = {
            username: input[0].value,
            password: input[1].value 
        }
    
        pages.postAPI(url, post_data);
    });
}

pages.load_signup = async () => {

    btn.addEventListener("click", async function () {
        const input = document.getElementsByClassName("input");

        const url = base_url + "signup.php";

        const post_data = {
            name: input[0].value,
            email: input[1].value,
            username: input[2].value,
            password: input[3].value 
        }
    
        pages.postAPI(url, post_data);
    });
}

pages.load_forget_pass = async () => {

    btn.addEventListener("click", async function () {
        const input = document.getElementsByClassName("input");

        const url = base_url + "forget_pass.php";

        const post_data = {
            username: input[0].value,
            password: input[0].value 
        }
    
        pages.postAPI(url, post_data);
    });
}