import { useState } from "react";
import { postData } from "../../../fetchData/fetchFromApi";
import { useNavigate } from "react-router-dom";
import { FormCar } from "./form";

function Create() {
  const [car, setCars] = useState({
    name: "",
    marks: "",
    number: "",
    number_of_place: "",
    type: "",
    driver: "",
  });
  const [message, setMessage] = useState("");
  const navigate = useNavigate("");

  const postCar = async (car) => {
    const { result } = await postData("settings/car/create", car);
    setCars(result?.data);
    setMessage(result?.message);
    navigate("/settings/car");
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    postCar(car);
  };

  const handleChange = (e) => {
    setCars({ ...car, [e.target.name]: e.target.value });
  };

  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-xl">
        Insertion de voyageur
      </h3>
      <FormCar
        textButton="Enregistrer"
        handleChange={handleChange}
        handleSubmit={handleSubmit}
        car={car}
      />
    </div>
  );
}
export default Create;
