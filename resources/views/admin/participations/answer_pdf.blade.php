<!DOCTYPE html>
<html><body>
<style>
*, html {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
}
html {
    margin: 5px 10px;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    line-height: 1.2;
}
p {
    margin-bottom: 7px;
}
.page_wrap {
	width: 94%;
	margin: 3% auto;
}
.top_section {

}

.question_box {
	width: 96%;
	padding: 15px;
	background-color: #eee;
	margin-bottom: 5px;
}
.question_box h4 {
	font-size: 16px;
}

.answer_box {
	width: 96%;
	padding: 10px 15px;
	background-color: #eee;
	margin-bottom: 20px;
}

.question_box p, .question_txt, .question_txt p, 
.question_box ul li, .question_box ol li, .answer_box p, .answer_box ul li, .answer_box ol li {
	font-size: 12px;
}
.question_box ul, .question_box ol, .answer_box ul, .answer_box ol {
	margin-left: 20px;
}
.question_box ol, .answer_box ol {
	list-style-type: lower-alpha;
}

td {
    padding: 8px;
    border-bottom: solid 1px #ccc;
}
</style>


<div class="page_wrap">
	<div class="top_section">
		<h2>{{ $program }}</h2>
		<h3>Name: {{ $participation->firstname }} {{ $participation->lastname }}</h3>
		<h4>Exam: {{ $exam->exam_title }}</h4>
		<h4>Number of Questions: {{ $exam->number_of_questions }}</h4>
	</div><br>

	@foreach($answers as $answer)
	<div class="question_cont">
        <div class="question_box">
            <p><strong>Question: </strong></p>
            <div class="question_txt">{!! $answer->question_name !!}</div>
            <p class="marks">Marks for Question: {{ $answer->max_point }}</p>
        </div>
        <div class="answer_box">
            <p><strong>Answer Provided: </strong></p>
            <div class="answer_txt">
              {!! $answer->response !!}
            </div>
        </div>
    </div>
	@endforeach
</div>

</body>
</html>