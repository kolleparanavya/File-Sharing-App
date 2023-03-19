import React from "react";
import "./login.css";
import profile from "./images/a.jpeg";
import email from "./images/email.jpeg";
import pass from "./images/pass.jpeg";
import {Link} from "react-router-dom";



const Loginform =() =>{
  return (
    <div className="main">
      <div className="sub-main">
        <div>
          <div className="imgs">
            <div className="image">
              <img src ={profile} alt="profile" className="profile"/>
            </div>
        
          </div>
          
          <div>
            <h1>Login Page</h1>
            <form action="http://localhost:3000/src/login.php"
                method="post" encType="multipart/form-data">
            <div>
              
              <img src={email} alt="email" className ="email-icon"/>
              <input className = "accountinput" type="text" placeholder="email " name="email"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="password" placeholder="password" name="password"/>
              </div>
              <div className="login-button">
              <input type="submit" name="submit" value="Login"/>
              </div>
          
                <p className="lin">
                <Link to = "/Forgetpassword">Forget Password</Link> or New User <Link to = "/Createaccount">Sign Up</Link>
                  
                </p>
              
                </form>
          </div>
          
        </div>
       
      </div>
    </div>
  )
}

export default Loginform;