@extends('layouts.main')


@section('content')

	<div class="row">

		<div class="small-2 large-centered columns">

			<div id="clock">
				<input type="text" v-model="digitalClock" class="clock"/>
			</div>

		</div>

	</div>


	<div class="row">
		<div class="small-7 large-centered columns">
			<div class="callout">

			<!-- 
				Task header 
			-->
			<h1 class="text-center">
				To do list 
				<span>
					( {{ $items->count() }} )
				</span>
			</h1>



			<div class="row">
				

					<!-- 
						Errors for new tasks
				 	-->
					@foreach ($errors->all() as $error)

						<p>{{ $error }}</p>

					@endforeach


					<!-- New task form -->
					{{ Form::open(array('url' => '/new')) }}

					<div class="large-3 columns">
						{{ Form::text('new', '', array('placeholder' => 'Task Name')) }}
					</div>



					<div class="large-6 columns">

						<div class="input-group">

							<div class="input-group-field large-7">
								<input type="text" id="datepicker" placeholder="Date due" name="date"></p>
							</div>

							<div class="input-group-field">
								{{ Form::selectRange('hour',00,23) }}
							</div>

							<div class="input-group-field">
								{{ Form::select('minutes',array('00', '15', '30', '45')) }}
							</div>
						
						</div>

					</div>




					<div class="large-3 columns ">
								{{ Form::submit('New Task', array('class' => 'button postfix')) }}
							
					</div>

					{{ Form::close() }}  <!-- close form -->

						
			</div>
			
		
			<!-- 
				Titles for Tasks
			 -->
			<div class="row">

				<div class="large-5 columns">
					<strong>Task Name</strong>
				</div>

				<div class="large-5 columns">
					<strong>Due Date</strong>
				</div>

				<div class="large-2 columns">
					<strong>Completed</strong>
				</div>

			</div>



			<!-- 
				List all tasks
			 -->
			<div class="row">

				@foreach ($items as $item)
					{{ Form::open(array('url' => ' ')) }}

					<div class="large-5 columns">
						{{ $item->name }}
						{{ Form::hidden('id', $item->id)}}
					</div>

					<div class="large-5 columns">
						{{ $item->dueDate }}
					</div>

					<div class="large-2 columns">
						<input type="checkbox" onclick="submit()"  value="{{ $item->id }}" {{ $item->completed ? 'checked' : ''}} >
					</div>

					{{ Form::close() }}
				@endforeach

			</div>

				


			<!-- 
				Titles for Completed Tasks
			 -->		
			<h1 class="text-center">
				Completed
				<span>
					( {{ $completed->count() }} )
				</span>

				
					{{ Form::open(array('url' => '/clear')) }}

						{{ Form::hidden('clear', '1')}}
						{{ Form::submit('Clear Completed Tasks', array('class' => 'button alert')) }}

					{{ Form::close() }}
				
			</h1>
		

			<!-- 
				List all completed tasks
			 -->
			 <div class="row">
			 		<div class="large-8">


			 			<div class="large-5 columns">
			 				<strong>Task Name</strong>
			 			</div>


			 			<div class="large-7 columns">
			 				<strong>Date Completed</strong>
			 			</div>


			 		</div>
			 </div>

 			 <div class="row">
		 		<div class="large-8">

		 			@foreach ($completed as $item)

			 			<div class="large-5 columns">
			 				<del>{{ $item->name }}</del>
			 			</div>


			 			<div class="large-7 columns">
				 			<?php
				 				$date = $item->updated_at;
				 				echo date_format($date, 'd/m/Y H:i:s');
				 			?>
			 			
			 			</div>

		 			@endforeach

		 			</div>

		 		</div>
			</div>




				
		
	</div>


@stop