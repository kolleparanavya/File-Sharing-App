import "./App.css";
import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";
import Home from "./Home";

import Loginform from "./Loginform";
import Createaccount from "./Createaccount";
import Dashboard from "./Dashboard";
import Images from "./Images";
import Pdfs from "./Pdfs";
import Documents from "./Documents";
import Ppt from "./Ppt";
import Profile from "./Profile";
import Upload from "./Upload";
import Search from "./Search";
import Viewfiles from "./Viewfiles";
import Videos from "./Videos";
import Userinterface from "./Userinterface";
import Forgetpassword from "./Forgetpassword";






function App() {
  return (
    <>
      <Router>
        <Switch>
          <Route exact path="/" component={Home} />
         
          <Route path="/Loginform" component={Loginform} />
          <Route path="/Createaccount" component={Createaccount} />
          <Route path="/Dashboard" component={Dashboard} />
          <Route path="/Images" component={Images}/>
          <Route path="/Pdfs" component={Pdfs}/>
          <Route path="/Videos" component={Videos}/>
          <Route path="/Documents" component={Documents}/>
          <Route path="/Ppt" component={Ppt}/>
          <Route path="/Profile" component={Profile}/>
          <Route path="/Search" component={Search}/>
          <Route path="/Upload" component={Upload}/>
          <Route path="/Viewfiles" component={Viewfiles}/>
          <Route path="/Userinterface" component={Userinterface}/>
          <Route path="/Forgetpassword" component={Forgetpassword}/>
         
         
         
        
        </Switch>
      </Router>
    </>
  );
}
  
export default App;