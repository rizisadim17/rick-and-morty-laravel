import { api } from '@/lib/api';
import Link from 'next/link';

export default async function EpisodesPage() {
  const episodes = await api.episodes.list();

  return (
    <div>
      <h1 className="text-3xl font-bold text-green-400 mb-6">Episodes</h1>
      <div className="space-y-3">
        {episodes.map((episode) => (
          <Link
            key={episode.id}
            href={`/episodes/${episode.id}`}
            className="flex items-center justify-between bg-gray-800 hover:bg-gray-700 rounded-xl p-4 transition-colors"
          >
            <div>
              <span className="text-green-400 font-mono text-sm">{episode.episode}</span>
              <h3 className="text-white font-semibold">{episode.name}</h3>
            </div>
            <span className="text-gray-400 text-sm">{episode.air_date}</span>
          </Link>
        ))}
      </div>
    </div>
  );
}
