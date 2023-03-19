import React from "react";
import "./forget.css";
import profile from "./images/a.jpeg";
import email from "./images/email.jpeg";
import pass from "./images/pass.jpeg";
import {Link} from "react-router-dom";



const Forgetpassword =() =>{
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
            <h1>Forget Password</h1>
            <form action="http://localhost:3000/src/forget.php"
                method="post" encType="multipart/form-data">
            <div>
              
              <img src={email} alt="email" className ="email-icon"/>
              <input className = "accountinput" type="text" placeholder="email " name="email"/>
              </div>
              <br></br>
              <hr></hr>
              <div>
  <select name="security-question" className="questions">
    <option value="">Choose a security question</option>
    <option value="q1">What was your Favorite place?</option>
    <option value="q2">What is your school name?</option>
    <option value="q3">What is your favorite subject?</option>
  </select>
</div>
<div className="second-input">
  <input className = "accountinput"  type="text" placeholder="Type your answer here" name="security-answer"/>
</div>
<hr></hr>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="password" placeholder="New password" name="password"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="password" placeholder="Confirm New password" name="reppsw"/>
              </div>
              <div className="login-button">
              <input type="submit" name="submit" value="Update Password"/>
              </div>
          
                <p className="lin">
                   Login again <Link to = "/Loginform">Login</Link>
                  
                </p>
              
                </form>
          </div>
          
        </div>
       
      </div>
    </div>
  )
}

export default Forgetpassword;