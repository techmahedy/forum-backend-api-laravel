import Helper from "./Helper";

class Token 
{  
    isValidPayload = token => {
        //iss: "http://127.0.0.1:8000/api/v1/login"
        const payload = this.payload(token);
        if(payload) {
            return payload?.iss === 'http://127.0.0.1:8000/api/v1/login' ? true : false;
        }
        return false;
    }

    payload = (token) => {
        const payload = token.split('.')[1];
        return this.decodePayload(payload);
    }

    decodePayload = payload => {
        return JSON.parse(atob(payload));
    }

    hasToken = () => {
        const __storedToken = Helper.getToken();
        if(__storedToken){
            return this.isValidPayload(__storedToken) ? true : false;
        }

        return false;
    }

    loggedIn = () => {
        return this.hasToken();
    }

    logOut = () => {
        Helper.clear();
    }
    user = () => {
        if(this.loggedIn()){
            return Helper.getUser();
        }
    }
    id = () => {
        if(this.loggedIn()){
            const payload = Token.payload(Helper.getToken());
            return payload?.sub;
        }
    }
}

export default Token = new Token();