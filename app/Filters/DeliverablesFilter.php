<?php


namespace App\Filters;


use App\Advertiser;
use App\Deliverable;
use Illuminate\Database\Eloquent\Builder;

class DeliverablesFilter extends EloquentFilter
{
    const MODEL = Deliverable::class;

    /**
     * @param $dataRange
     *
     * @return Builder
     */
    public function filterDateRange($dataRange): Builder
    {
        return $this->query()->where(
            function ($queryBuilder) use ($dataRange) {
                return $queryBuilder->whereBetween('concept_deadline', $dataRange)->orWhereBetween(
                    'publication_deadline',
                    $dataRange
                );
            }
        );

    }

    /**
     * @param $status
     *
     * @return Builder
     */
    public function filterStatus($status): Builder
    {
        return $this->query()->where('status', '=', $status);
    }

    /**
     * @param $advertiserId
     *
     * @return Builder
     */
    public function filterAdvertiser($advertiserId): Builder
    {
        return $this->query()->whereHas(
            'campaign.advertiser',
            function (Builder $q) use ($advertiserId) { return $q->where('uuid', '=', $advertiserId); }
        );
    }

    /**
     * @param $campaignId
     *
     * @return Builder
     */
    public function filterCampaign($campaignId): Builder
    {
        return $this->query()->whereHas(
            'campaign',
            function (Builder $q) use ($campaignId) { return $q->where('uuid', '=', $campaignId); }
        );
    }

    /**
     * @param $influencerId
     *
     * @return Builder
     */
    public function filterInfluencer($influencerId): Builder
    {
        return $this->query()->whereHas(
            'influencers',
            function (Builder $q) use ($influencerId) { return $q->where('uuid', '=', $influencerId); }
        );
    }
}

