<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use Filament\Actions;
use App\Models\TaskStatus;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\App\Resources\TaskFollowUpResource;

class EditTaskFollowUp extends EditRecord
{
    protected static string $resource = TaskFollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
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
    }
}
