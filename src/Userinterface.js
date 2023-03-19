
import React from "react";


const Userinterface = () => {
  const handleSubmit = (event) => {
    event.preventDefault();
    const question = "In which mode you want to upload your file";
    const options = [
      { name: "PRIVATE", path: "http://localhost:3000/src/Backend.php" },
      { name: "PUBLIC", path: "http://localhost:3001/Dashboard" },
      { name: "BOTH", path: "http://localhost:3001/Login" }
    ];

    const optionsString = options.map((option, idx) => `${idx+1}. ${option.name}`).join("\n");
    const userInput = window.prompt(`${question}\n${optionsString}`);
    if(userInput !== null) {
      const selectedOption = options[userInput-1]
      if(selectedOption) {
        window.location.replace(selectedOption.path);
      }
    }
  }
  return (
    <>
      <div className="fileupload">
        <center>
          <form onSubmit={handleSubmit}>
            <br></br>
            <center>
              <h1>UPLOAD YOUR FILE HERE</h1>
            </center>
            <hr></hr>
            <br></br>
            <center>
              <input type="file" name="fileupload" />
            </center>
            <br></br>
            <br></br>
            <center>
              <input className="submitfile" type="submit" name="submit" value="UPLOAD" />
            </center>
          </form>
        </center>
      </div>
    </>
  );
};

export default Userinterface;