<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use Filament\Actions;
use App\Models\TaskStatus;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Validation\ValidationException;
use App\Filament\App\Resources\TaskFollowUpResource;

class ListTaskFollowUps extends ListRecords
{
    protected static string $resource = TaskFollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->mutateFormDataUsing(function (array $data): array {
                // dd(auth()->guard('emp')->user());
                if (auth()->guard('emp')->user()->is_admin == 0) {

                    $task_status = TaskStatus::where('id', $data['task_status_id'])->first();
                    // dd($task_status);
                    if ($task_status->only_for_admin == true) {
                        Notification::make()
                            ->title('ليس لديك صلاحية')
                            ->danger()
                            ->send();

                        throw ValidationException::withMessages([
                                'task_status_id' => 'ليس لديك صلاحية لتعيين هذا الحالة.',
                        ]);
                    }

                }
                $data['emp_id'] = auth()->guard('emp')->id();

                return $data;
            }),
        ];
    }
}
