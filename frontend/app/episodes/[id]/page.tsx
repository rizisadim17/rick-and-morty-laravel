import { api } from '@/lib/api';
import CharacterCard from '@/components/CharacterCard';
import PaginationControls from '@/components/Pagination';
import Link from 'next/link';
import { notFound } from 'next/navigation';
import { Suspense } from 'react';

interface Props {
  params: Promise<{ id: string }>;
  searchParams: Promise<{ page?: string }>;
}

export default async function EpisodePage({ params, searchParams }: Props) {
  const { id } = await params;
  const { page } = await searchParams;
  const currentPage = Number(page ?? 1);

  try {
    const data = await api.episodes.get(Number(id), currentPage);

    return (
      <div>
        <Link href="/episodes" className="text-green-400 hover:underline text-sm mb-4 inline-block">
          ← Back to Episodes
        </Link>

        <div className="bg-gray-800 rounded-2xl p-6 mb-8">
          <span className="text-green-400 font-mono">{data.episode.episode}</span>
          <h1 className="text-3xl font-bold text-white mt-1">{data.episode.name}</h1>
          <p className="text-gray-400 mt-1">Air date: {data.episode.air_date}</p>
        </div>

        <h2 className="text-xl font-semibold text-green-400 mb-4">
          Characters ({data.pagination.total_pages > 1 ? `page ${currentPage}` : data.characters.length})
        </h2>

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
