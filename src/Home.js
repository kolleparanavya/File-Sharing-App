
import React from "react";
// importing Link from react-router-dom to navigate to 
// different end points.
import "./Home.css";
import { Link } from "react-router-dom";
  
const Home = () => {
  return (
    <div className="background">
        <center>
            <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
            <h1 class="title">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;File Sharing App</h1>
            <Link to="/Loginform"><button class="getstarted">Get Started</button></Link>
            <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
            <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
        </center>
    </div>
  );
};
  
export default Home;