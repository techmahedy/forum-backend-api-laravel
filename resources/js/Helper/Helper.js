import Token from "./Token"

class Helper 
{
    login = formData => {
        axios.post('/api/v1/login',formData)
                .then((response)=>{
                   this.responseAfterLogin(response)
                })
                .catch((error)=>{
                    console.log(error)
                })
    }

    responseAfterLogin = response => {
        const __token = response.data.access_token;
        const __user = response.data.user;
        if(Token.isValidPayload(__token)){
            this.store(__user,__token);
        }
    }

    storeToken = __token => {
       localStorage.setItem('token',__token)
    }

    storeUser = user => {
        localStorage.setItem('user',user)
    }

    store = (user,token) => {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear = () => {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    getToken = () => {
        return localStorage.getItem('token');
    }

    getUser = () => {
        return localStorage.getItem('user');
    }
}

export default Helper = new Helper();