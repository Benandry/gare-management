import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import Button from "../../../components/Button";
import Input from "../../../components/Input";
import Select from "../../../components/Select";
import { getData } from "../../../fetchData/fetchFromApi";

export function FormCar({ car, handleChange, handleSubmit, textButton }) {
  const [drivers, setDrivers] = useState({});
  const [loading, setLoading] = useState(false);

  const fetchData = async () => {
    setLoading(true);
    const { result } = await getData("settings/driver/index");
    setDrivers(result?.data);
    setLoading(false);
  };

  useEffect(() => {
    fetchData();
  }, []);

  if (loading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
  return (
    <form className=" " onSubmit={handleSubmit}>
      <div className="flex justify-center gap-4">
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={car?.name}
            id="name"
            label="Nom du voiture"
            placeholder="Entrer le nom"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={car?.marks}
            id="marks"
            label="Marques "
            placeholder="Entrer le marque"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={car?.number}
            id="number"
            label="Numero du voitures"
            placeholder="Entrer le numero"
            type="text"
            required={true}
          />
        </div>
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={car?.number_of_place}
            id="number_of_place"
            label="Nombre de place"
            placeholder="Entrer le nombre de place"
            type="number"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={car?.type}
            id="type"
            label="Type"
            placeholder="Entre le permis chauffeur"
            type="text"
            required={true}
          />
          <Select
            handleChange={handleChange}
            value={car?.driver}
            id="driver"
            label="Chaffeur"
            options={drivers}
          />
        </div>
      </div>
      <div className="flex gap-4 items-center">
        <Button type="submit" label={textButton} color="blue" />
        <Link to="/settings/driver">Listes </Link>
      </div>
    </form>
  );
}
