import Link from 'next/link';
import Image from 'next/image';
import type { Character } from '@/types';

const statusColor: Record<string, string> = {
  Alive: 'bg-green-500',
  Dead: 'bg-red-500',
  unknown: 'bg-gray-400',
};

interface Props {
  character: Character;
}

export default function CharacterCard({ character }: Props) {
  return (
    <Link href={`/characters/${character.id}`} className="group block bg-gray-800 rounded-xl overflow-hidden shadow hover:shadow-green-500/30 hover:scale-[1.02] transition-transform duration-200">
      <div className="relative h-48 w-full overflow-hidden">
        <Image
          src={character.image}
          alt={character.name}
          fill
          className="object-cover group-hover:scale-110 transition-transform duration-300"
          sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 25vw"
        />
      </div>
      <div className="p-3">
        <h3 className="text-white font-semibold truncate">{character.name}</h3>
        <div className="flex items-center gap-1.5 mt-1 text-sm text-gray-300">
          <span className={`inline-block w-2.5 h-2.5 rounded-full ${statusColor[character.status] ?? 'bg-gray-400'}`} />
          {character.status} — {character.species}
        </div>
        <p className="text-xs text-gray-400 mt-1 truncate">{character.location.name}</p>
      </div>
    </Link>
  );
}
