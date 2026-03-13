import { api } from '@/lib/api';
import CharacterCard from '@/components/CharacterCard';

export default async function CharactersPage() {
  const characters = await api.characters.list();

  return (
    <div>
      <h1 className="text-3xl font-bold text-green-400 mb-6">Characters</h1>
      <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        {characters.map((character) => (
          <CharacterCard key={character.id} character={character} />
        ))}
      </div>
    </div>
  );
}
