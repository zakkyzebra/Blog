@extends('layouts.master')

@section('content')

	<main ng-app="blog" class="container gimmeHead">
	    <div ng-controller="ManagePostsController" class="row">
	        <table style="width: 75%">
	        	<tr>
	        		<td><strong>Post Id</strong></td>
	        		<td><strong>Title</strong></td>
	        		<td><strong>Description</strong></td>
	        		<td><strong>User</strong></td>
	        	</tr>
	            <tr ng-repeat="post in posts">
	                <td>@{{ post.id }}</td>
	                <td>@{{ post.title }}</td>
	                <td>@{{ post.description }}</td>
	                <td>@{{ post.user.username }}</td>
	                <td>
	                	<a class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>

	                	<button ng-click="removePost($index)" id="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
	                </td>

	            </tr>
	        </table>
	    </div>
	    <div ng-controller="ModalDemoCtrl">
	        <script type="text/ng-template" id="myModalContent.html">
	            <div class="modal-header">
	                <h3 class="modal-title">Im a modal!</h3>
	            </div>
	            <div class="modal-body">
	                <ul>
	                    <li ng-repeat="item in items">
	                        <a href="#" ng-click="$event.preventDefault(); selected.item = item">{{ item }}</a>
	                    </li>
	                </ul>
	                Selected: <b>{{ selected.item }}</b>
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
	                <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
	            </div>
	        </script>

	        <button type="button" class="btn btn-default" ng-click="open()">Open me!</button>
	        <button type="button" class="btn btn-default" ng-click="open('lg')">Large modal</button>
	        <button type="button" class="btn btn-default" ng-click="open('sm')">Small modal</button>
	        <button type="button" class="btn btn-default" ng-click="toggleAnimation()">Toggle Animation ({{ animationsEnabled }})</button>
	        <div ng-show="selected">Selection from a modal: {{ selected }}</div>
	    </div>
	</main>


@stop

@section('script')
    <script type="text/javascript" src="/js/angular.bootstrap.js"></script>
    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script type="text/javascript" src="/js/blog.js"></script>
@stop