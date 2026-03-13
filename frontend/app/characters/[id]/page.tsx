import { api } from '@/lib/api';
import Image from 'next/image';
import Link from 'next/link';
import { notFound } from 'next/navigation';

const statusColor: Record<string, string> = {
  Alive: 'text-green-400',
  Dead: 'text-red-400',
  unknown: 'text-gray-400',
};

interface Props {
  params: Promise<{ id: string }>;
}

export default async function CharacterPage({ params }: Props) {
  const { id } = await params;

  try {
    const character = await api.characters.get(Number(id));

    return (
      <div className="max-w-2xl mx-auto">
        <Link href="/characters" className="text-green-400 hover:underline text-sm mb-4 inline-block">
          ← Back to Characters
        </Link>

        <div className="bg-gray-800 rounded-2xl overflow-hidden shadow-xl">
          <div className="relative h-64 w-full">
            <Image src={character.image} alt={character.name} fill className="object-cover" />
          </div>

          <div className="p-6 space-y-4">
            <h1 className="text-3xl font-bold text-white">{character.name}</h1>

            <div className="grid grid-cols-2 gap-3 text-sm">
              <InfoRow label="Status">
                <span className={statusColor[character.status] ?? 'text-gray-400'}>
                  {character.status}
                </span>
              </InfoRow>
              <InfoRow label="Species">{character.species}</InfoRow>
              <InfoRow label="Gender">{character.gender}</InfoRow>
              <InfoRow label="Origin">{character.origin.name}</InfoRow>
              <InfoRow label="Last Location">{character.location.name}</InfoRow>
              <InfoRow label="Episodes">{character.episode.length}</InfoRow>
            </div>
          </div>
        </div>
      </div>
    );
  } catch {
    notFound();
  }
}

function InfoRow({ label, children }: { label: string; children: React.ReactNode }) {
  return (
    <div>
      <span className="text-gray-400 block text-xs uppercase tracking-wide">{label}</span>
      <span className="text-white font-medium">{children}</span>
    </div>
  );
}
