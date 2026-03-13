import { api } from '@/lib/api';
import CharacterCard from '@/components/CharacterCard';
import PaginationControls from '@/components/Pagination';
import { notFound } from 'next/navigation';
import { Suspense } from 'react';

interface Props {
  params: Promise<{ id: string }>;
  searchParams: Promise<{ page?: string }>;
}

export default async function LocationPage({ params, searchParams }: Props) {
  const { id } = await params;
  const { page } = await searchParams;
  const currentPage = Number(page ?? 1);

  try {
    const data = await api.locations.get(Number(id), currentPage);

    return (
      <div>
        <div className="bg-gray-800 rounded-2xl p-6 mb-8">
          <h1 className="text-3xl font-bold text-white">{data.location.name}</h1>
          <div className="flex gap-4 mt-2 text-sm text-gray-400">
            <span>Type: <span className="text-white">{data.location.type}</span></span>
            <span>Dimension: <span className="text-white">{data.location.dimension}</span></span>
          </div>
        </div>

        <h2 className="text-xl font-semibold text-green-400 mb-4">Residents</h2>

        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
          {data.characters.map((character) => (
            <CharacterCard key={character.id} character={character} />
          ))}
        </div>

        <Suspense>
          <PaginationControls pagination={data.pagination} />
        </Suspense>
      </div>
    );
  } catch {
    notFound();
  }
}
