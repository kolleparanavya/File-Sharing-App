import React from "react";
import "./Createaccount.css";
import profile from "./images/a.jpeg";
import email from "./images/email.jpeg";
import pass from "./images/pass.jpeg";
import {Link} from "react-router-dom";



const Createaccount =() =>{
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
            <h1>Register</h1>
            <form action="http://localhost:3000/src/create.php"
                method="post" encType="multipart/form-data">
            <div>
              <img src={email} alt="email" className ="email-icon"/>
              <input className = "accountinput" type="text" placeholder="Name" name="name"/>
              </div>
            <div className="second-input">
              <img src={email} alt="email" className ="email-icon"/>
              <input className = "accountinput" type="text" placeholder="email " name="email"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="text" placeholder="Enter your favorite place" name="place"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="text" placeholder="Enter your school name" name="school"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="text" placeholder="Enter your favorite subject" name="subject"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="password" placeholder="password" name="password"/>
              </div>
              <div className="second-input">
                <img src={pass} alt="pass" className ="email-icon"/>
                <input className = "accountinput" type="password" placeholder="confirm password" name="pswrepeat"/>
              </div>

              <div className="login-button">
              <input type="submit" name="submit" value="Register"/>
              </div>
          
                <p className="lin">
                  Already have an account ? <Link to="/Loginform">login</Link>
                  
                </p>
              
              </form>
          </div>
              
        </div>

      </div>
    </div>
  )
}

export default Createaccount;