import React, { useState } from "react";
import "./Dashboard1.css";
import "./Dashboard.css";

const Dashboard1 = () => {
  const [showPopup, setShowPopup] = useState(false);
  const [popupShown, setPopupShown] = useState(false);

  if (!popupShown) {
    setTimeout(() => {
      setShowPopup(true);
      setPopupShown(true);
    }, 200);
  }

  return (
    <div>
      <div className="header">
        <br />
        <h1 className="Heading">
          

            <font color="white">File Sharing App</font>
         
        </h1>
        <hr></hr>
        </div>
        <hr></hr>
        <br></br><br></br>
        <div  className="fileupload">
            <center>
            <form action="http://localhost:3000/src/Backend.php"
                method="post" encType="multipart/form-data">
                    <br></br>
                    <center><h1>UPLOAD YOUR FILE HERE</h1></center>
                    <hr></hr><br></br>
                <center><input type="file" name = "fileupload"/></center><br></br><br></br>
                    <center><input className="submitfileupload" type="submit" name="submit"  value="UPLOAD"/></center>
                    
                </form>
                </center>
               <br></br><br></br>
                    
        </div>
      
      {showPopup && (
        <div className="popup">
          <div className="popup-content">
            <p>Login Successful</p>
            <button className="close-button" onClick={() => setShowPopup(false)}>
              Close
            </button>
          </div>
        </div>
      )}
    </div>
  );
};

export default Dashboard1;