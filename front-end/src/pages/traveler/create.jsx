import { useState } from "react";
import Button from "../../components/Button";
import Input from "../../components/Input";
import { useNavigate } from "react-router-dom";

function Create() {
  const [message, setMessage] = useState("");
  const [travelerData, setTravelerData] = useState({
    firstName: "",
    lastName: "",
    email: "",
    phone: "",
    adresse: "",
    travel_story: "",
  });

  const navigate = useNavigate("");

  const postTravelerData = async (travelerData) => {
    const response = await fetch("https://127.0.0.1:8001/api/traveler/create", {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      mode: "cors",
      cache: "no-cache",
      headers: {
        "Content-Type": "application/json",
      },
      redirect: "follow",
      referrerPolicy: "no-referrer",
      body: JSON.stringify(travelerData),
    });

    const result = await response.json();
    console.log(result);
    return result;
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const response = postTravelerData(travelerData);
    setMessage(response?.message);
    navigate("/traveler");
  };
  const handleChange = (e) => {
    setTravelerData({ ...travelerData, [e.target.name]: e.target.value });
  };

  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-3xl">
        Insertion de voyageur
      </h3>

      <form className="max-w-lg mx-auto" onSubmit={handleSubmit}>
        <Input
          handleChange={handleChange}
          value={travelerData.firstName}
          id="firstName"
          label="Nom du voyageur"
          placeholder="Entrer le nom du voyageur"
          type="text"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.lastName}
          id="lastName"
          label="Prénom du voyageur"
          placeholder="Entrer le prénom du voyageur"
          type="text"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.email}
          id="email"
          label="Email"
          placeholder="Entre le email du voyageur"
          type="email"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.phone}
          id="phone"
          label="Numero de téléphone"
          placeholder="Entrer le numéro de téléphone"
          type="phone"
        />
        <Input
          handleChange={handleChange}
          value={travelerData.adresse}
          id="adresse"
          label="Adresse"
          placeholder="Entrer l'adresse complete numéro de téléphone"
          type="text"
        />

        <Input
          handleChange={handleChange}
          value={travelerData.travel_story}
          id="travel_story"
          label="Deja voyager"
          placeholder=".."
          type="text"
        />
        <Button type="submit" label="Enregistrer" color="blue" />
      </form>
    </div>
  );
}

export default Create;
