<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyDataTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = '';
    public $sortAsc = true;
    public $selected = [];
    public $perPage = 5;
    protected $queryString = ['search', 'sortField', 'sortAsc'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($fieldName)
    {
        if ($this->sortField === $fieldName) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $fieldName;
    }

    public function deleteCompanies()
    {
        Company::destroy($this->selected);
    }

    public function render()
    {
        return view('livewire.company-data-table', [
            'companies' => Company::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('website', 'like', '%' . $this->search . '%')
                ->when($this->sortField, fn($query) => $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc'))
                ->paginate($this->perPage)
        ]);
    }
}
