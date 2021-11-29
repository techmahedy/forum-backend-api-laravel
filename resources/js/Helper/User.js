import Token from "./Token"

class User 
{
    login = formData => {
        axios.post('/api/v1/login',formData)
                .then((response)=>{
                   this.responseAfterLogin(response);
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
            window.location = '/forum';
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

    hasToken = () => {
        const __storedToken = this.getToken();
        if(__storedToken){
            return Token.isValidPayload(__storedToken) ? true : false;
        }

        return false;
    }

    loggedIn = () => {
        return this.hasToken();
    }

    logout = () => {
        this.clear();
        window.location = '/forum';
    }
    user = () => {
        if(this.loggedIn()){
            return this.getUser();
        }
    }
    id = () => {
        if(this.loggedIn()){
            const payload = Token.payload(this.getToken());
            return payload?.sub;
        }
    }
}

export default User = new User();