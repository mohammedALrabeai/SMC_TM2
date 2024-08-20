<?php

namespace App\Filament\App\Resources\TaskResource\RelationManagers;

use App\Models\Task;
use App\Models\TaskFollowUp;
use App\Models\TaskStatus;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use App\Services\WhatsAppService;
use Illuminate\Validation\ValidationException;

class TaskFollowUpsRelationManager extends RelationManager
{
    protected static string $relationship = 'taskFollowUps';

    protected static ?string $recordTitleAttribute = 'id';

    public function form(Forms\Form $form): Forms\Form
    {
        // $userId = auth()->guard('emp')->user()->user_id;
        return $form
            ->schema([
                // Forms\Components\TextInput::make('emp_id')
                //     ->required()
                // //     ->numeric(),
                // Forms\Components\Select::make('task_id')
                // ->relationship('task', 'title'),
                //     Forms\Components\Select::make('task_id')
                //     ->label('Task')
                //     ->options(function () use ($userId) {
                //         return Task::whereHas('project', function (Builder $query) use ($userId) {
                //             $query->where('user_id', $userId);
                //         })->pluck('title', 'id');
                //     })
                //     ->required(),
                Forms\Components\Select::make('task_status_id')
                    ->relationship('taskStatus', 'name'),
                Forms\Components\Textarea::make('note')
                    ->required(),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id')
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('emp_id')
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('task_status_id')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('emp.name')  // Assuming relationship is defined in TaskFollowUp model
                    ->label('Employee')
                    ->sortable(),
                Tables\Columns\TextColumn::make('task.title') // Assuming relationship is defined in TaskFollowUp model
                    ->label('Task Title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('taskStatus.name') // Assuming relationship is defined in TaskFollowUp model
                    ->label('Task Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('note'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
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
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['emp_id'] = auth()->guard('emp')->id();


//         $phone_main = '966571718153';
// $auth = '40703bb7812b727ec01c24f2da518c407342559c';
// $profileId = 'aedd0dc2-8453';
// $phone = $phone_main.'@c.us';
// $message = 'test message';

// $response = WhatsAppService::send_with_wapi($auth, $profileId, $phone, $message);

// dd($response);
        return $data;
    }
}
