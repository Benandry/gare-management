import { Link } from "react-router-dom";
import Button from "../../components/Button";
import Input from "../../components/Input";

function FormTraveler({
  travelerData,
  handleChange,
  handleSubmit,
  textButton,
}) {
  return (
    <form className=" " onSubmit={handleSubmit}>
      <div className="flex justify-center gap-4">
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={travelerData?.firstName}
            id="firstName"
            label="Nom du voyageur"
            placeholder="Entrer le nom du voyageur"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={travelerData?.lastName}
            id="lastName"
            label="Prénom du voyageur"
            placeholder="Entrer le prénom du voyageur"
            type="text"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={travelerData?.email}
            id="email"
            label="Email"
            placeholder="Entre le email du voyageur"
            type="email"
            required={true}
          />
        </div>
        <div className="basis-1/2">
          <Input
            handleChange={handleChange}
            value={travelerData?.phone}
            id="phone"
            label="Numero de téléphone"
            placeholder="Entrer le numéro de téléphone"
            type="phone"
            required={true}
          />
          <Input
            handleChange={handleChange}
            value={travelerData?.adresse}
            id="adresse"
            label="Adresse"
            placeholder="Entrer l'adresse complete numéro de téléphone"
            type="text"
            required={true}
          />

          <Input
            handleChange={handleChange}
            value={travelerData?.travel_story}
            id="travel_story"
            label="Deja voyager"
            placeholder=".."
            type="text"
            required={true}
          />
        </div>
      </div>
      <div className="flex gap-4 items-center">
        <Button type="submit" label={textButton} color="blue" />
        <Link to="/traveler">Listes des voyageurs</Link>
      </div>
    </form>
  );
}

export default FormTraveler;
