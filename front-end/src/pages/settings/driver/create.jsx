import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { FormDriver } from "./form";
import { postData } from "../../../fetchData/fetchFromApi";

function Create() {
  const [driver, setDriver] = useState({
    name: "",
    lastName: "",
    phone: "",
    permis: "",
  });
  const [message, setMessage] = useState("");
  const navigate = useNavigate("");

  const postDriver = async (driver) => {
    const { result } = await postData("settings/driver/create", driver);
    setDriver(result?.data);
    setMessage(result?.message);
    navigate("/settings/driver");
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    postDriver(driver);
  };
  const handleChange = (e) => {
    setDriver({ ...driver, [e.target.name]: e.target.value });
  };

  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-xl">
        Insertion de voyageur
      </h3>
      <FormDriver
        textButton="Enregistrer"
        handleChange={handleChange}
        handleSubmit={handleSubmit}
        data={driver}
      />
    </div>
  );
}
export default Create;
