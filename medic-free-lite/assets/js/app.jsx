import SmokeCursor from "./smokecursor";
import "./smoke.css";

function App() {
  return (
    <>
      <SmokeCursor size={40} duration={900} blur={10} opacity={0.5} />
      <h1>Website kamu</h1>
    </>
  );
}

export default App;
