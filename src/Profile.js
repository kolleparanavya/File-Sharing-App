import React from 'react';
import "./Upload.css";
const Profile = () => {
  return(
      <div className='profileaccount'>
              <h1>Complete Your Profile Here</h1>
              <br></br>
              <hr></hr>
              <form>
            <label for="fullname"><b>Full Name <font color="brown">*</font></b></label><br></br><br></br>
            </form>
            <input className="profilefield" type="text" placeholder="Enter your full name" name="fullname" required/><br></br><br></br>
            <label for="email"><b>Email <font color="brown">*</font></b></label><br></br><br></br>
            <input className="profilefield" type="text" placeholder="Enter your Email Address" name="email" required/><br></br><br></br>
            <label for="dob"><b>Date of Birth <font color="brown">*</font></b></label><br></br><br></br>
            <input className="profilefield" type="date" name="dob" required/><br></br><br></br>
            <label for="Phone"><b>Phone Number <font color="brown">*</font></b></label><br></br><br></br>
            <input className="profilefield" type="text" placeholder="+91" name="phone" required/><br></br><br></br>
            <label for="linkedin"><b>Linkedin URL <font color="brown">*</font></b></label><br></br><br></br>
            <input className="profilefield" type="url" placeholder="Enter linkedin URL" name="linkedin" required/><br></br><br></br>
            <center>
              <input class="profilesubmit" type="submit" value="UPDATE PROFILE"/>
            </center>
            </div>
    )
}
export default Profile; 