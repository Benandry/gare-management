import { BrowserRouter } from "react-router-dom";
import "./App.css";
import Navbar from "./components/navbar";
import Sidebar from "./components/sidebar";
import AppRoutes from "./routes";

function App() {
  return (
    <BrowserRouter>
      <Navbar />
      {/* <Sidebar  /> */}
      <AppRoutes />
    </BrowserRouter>
  );
}

export default App;
